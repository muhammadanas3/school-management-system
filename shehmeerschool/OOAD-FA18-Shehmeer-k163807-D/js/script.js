

//Budget Controller

var BudgetController = (function(){

	var Expense = function(id, description, value){

		this.id = id;
		this.description = description;
		this.value = value;
		this.percentage = -1;
	};

	var Income = function(id, description, value){

		this.id = id;
		this.description = description;
		this.value = value;
	};

	Expense.prototype.calPercentage = function(income){

		this.percentage = Math.round((this.value / income) * 100);
	}

	Expense.prototype.getPercentage = function(){

		return this.percentage;
	}

	var data = {

		allItems:{

			inc: [],
			exp: []
		},
		totals: {

			inc: 0,
			exp: 0
		},
		budget: 0,
		percentage: -1
	};

	var calculateTotal = function(type)	{

		var sum = 0;

		data.allItems[type].forEach(function (current) {

			sum += current.value;
		});

		data.totals[type] = sum;
	};


	return{

		addItem: function(type, des, val){


			var newItem, ID;

			if(data.allItems[type].length > 0)
				ID = data.allItems[type][data.allItems[type].length -1].id + 1;
			else
				ID = 0;

			if(type === 'exp')
				newItem = new Expense(ID, des, val);
			else if(type === 'inc')
				newItem = new Income(ID, des, val);

			data.allItems[type].push(newItem);
			return newItem;
		},

		calculatePercentage: function(){

			// data.allItems.exp.forEach(function(current){

			// 	current.calPercentage(data.totals.inc);
			// });

				//alternate

			for(var i =0; i< data.allItems.exp.length; i++){

				data.allItems.exp[i].calPercentage(data.totals.inc);
			}
		},

		getPercentage: function(){

			var allPer = data.allItems.exp.map(function(cur) {

				return cur.getPercentage();
			});
			return allPer;
		},

		calculateBudget: function(){

			calculateTotal('inc');
			calculateTotal('exp');

			data.budget = data.totals.inc - data.totals.exp;

			if(data.totals.inc > 0)
				data.percentage = Math.round((data.totals.exp / data.totals.inc) * 100);
			
		},

		getBudget: function(){

			return{

				totalBudget: data.budget,
				totalInc: data.totals.inc,
				totalExp: data.totals.exp,
				percentage: data.percentage
			};
		},

		deleteItem: function(type, id){

			var idArray, index;

			idArray = data.allItems[type].map( function(current){

				// console.log(current);
				return current.id;
			});

			//alternate
			// idArray = data.allItems[type].map(Income);

			index = idArray.indexOf(id);

			if( index !== -1)
				data.allItems[type].splice(index, 1);

		},

		testing: function(){

			console.log(data);
		}
	}

})();

//UI Controller
var UIController = (function() {

	var DOMStrings = {

		inputType: '.input-type',
		inputDescription: '.input-description',
		inputValue: '.input-value',
		inputBtn: '.input-btn',
		expenseList: '.Expenses-list',
		incomeList: '.Income-list',
		totalBudget: '.totalBudget',
		incomeValue: '.income-value',
		expenseValue: '.expense-value',
		totalPercentage: '.expense-percentage',
		parent: '.parent',
		itemPercentage: '.item-percentage',
		month: '.month'

	};
	var formatNumber = function(num , type) {

		var splitString, int, dec;

		num = Math.abs(num);
		num = num.toFixed(2);

		splitString = num.split('.');

		int = splitString[0];
		dec = splitString[1];

		if(int.length > 3)
			int = int.substr(0, int.length - 3) + ',' + int.substr(int.length - 3, 3);


		return ( type === 'exp' ? '-' : '+' ) + int + '.' + dec;

	};
	return{

		getInput: function(){

			return{

				type: document.querySelector(DOMStrings.inputType).value,
				description: document.querySelector(DOMStrings.inputDescription).value,
				value: parseFloat(document.querySelector(DOMStrings.inputValue).value)
			};
		},

		getDOMStrings: function(){

			return DOMStrings;
			
		},

		displayBudget: function(obj){

			var type;
			
			obj.totalBudget > 0 ? type = 'inc' : type = 'exp';
			document.querySelector(DOMStrings.totalBudget).textContent = formatNumber(obj.totalBudget , type);
			document.querySelector(DOMStrings.incomeValue).textContent = formatNumber(obj.totalInc , 'inc');
			document.querySelector(DOMStrings.expenseValue).textContent = formatNumber(obj.totalExp , 'exp');
			if(obj.percentage > 0)
				document.querySelector(DOMStrings.totalPercentage).textContent = obj.percentage + '%';
			else
				document.querySelector(DOMStrings.totalPercentage).textContent ='---';

		},

		displayPercentage: function(percentage){


			var fields = document.querySelectorAll(DOMStrings.itemPercentage);


			nodeListForEach = function(list){

				for(var i =0; i<list.length; i++){
					callBack(list[i], i);
				}

			}
			// nodeListForEach(fields, function(current, index){

			// 	if(percentage[index] > 0)
			// 		current.textContent = percentage[index] + '%';
			// 	else
			// 		current.textContent = '---';

			// });

			//alternate

			var callBack = function(current, index){
				if(percentage[index] > 0)
			 		current.textContent = percentage[index] + '%';
			 	else
			 		current.textContent = '---';
			}

			nodeListForEach(fields);

		},

		addListItem: function(obj, type){


			var html, newHtml, list;

			if( type === 'inc'){

				list = DOMStrings.incomeList;

				// html = '<div class="item" id="inc-%id%"><div class="item-description">%description%</div><div><div class="item-value">%value%</div><div class="item-delete"><button class="item-delete-btn"><i class="ion-ios-close-outline"></i></button></div></div><div id="incbr-%id%"><br><hr></div></div>';

				html = '<div class="item" id="inc-%id%"><div class="row"><div class="col-3"><div class="item-description">%description%</div></div><div class="col-6"><div class="item-value">%value%</div></div><div class="col-3"><div class="item-delete"><button class="item-delete-btn btn btn-outline-primary" style="border:0px;"><i class="far fa-times-circle"></i></button></div></div><div id="incbr-%id%"><br><hr></div></div></div>';

			}
			else if( type === 'exp'){
				list = DOMStrings.expenseList;
				
				// html = '<div class="item" id="exp-%id%"><div class="item-description">%description%</div><div><div class="item-value">%value%</div><div class="item-percentage">21%</div><div class="item-delete"><button class="item-delete-btn"><i class="ion-ios-close-outline"></i></button></div></div><div id="expbr-%id%"><br><hr></div></div>';

				html = '<div class="item" id="exp-%id%"><div class="row"><div class="col-3"><div class="item-description">%description%</div></div><div class="col-4"><div class="item-value">%value%</div></div><div class="col-sm-2"><div class="item-percentage bg-danger rounded-circle p-0 text-white text-center" style="font-size:75%;">21%</div></div><div class="col-3"><div class="item-delete"><button class="item-delete-btn btn btn-outline-danger" style="border:0px;"><i class="far fa-times-circle"></i></button></div></div><div id="expbr-%id%"><br><hr></div></div></div>';
			}

			newHtml = html.replace('%id%' ,obj.id);
			newHtml = newHtml.replace('%description%', obj.description);
			newHtml = newHtml.replace('%value%', formatNumber(obj.value, type));

			document.querySelector(list).insertAdjacentHTML('beforeend', newHtml);

	
		},

		displayMonth: function(){


			var now = new Date();

			var year = now.getFullYear();
			var month = now.getMonth();
			var monthArr = ['January', 'Faburary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

			document.querySelector(DOMStrings.month).textContent = monthArr[month] + " " + year;

		},

		
		deleteItem: function(id, type) {

			var el = document.getElementById(id);
			el.parentNode.removeChild(el);


		},

		clearFields: function(){

			var field, fieldArr;

			field = document.querySelectorAll(DOMStrings.inputDescription + ',' + DOMStrings.inputValue);

			fieldArr = Array.prototype.slice.call(field);

			fieldArr.forEach(function(current, index, array) {

				current.value = "";
			});

			fieldArr[0].focus();

		}

	};
	

})();

var controller = (function (BudgetCtrl, UICtrl) {


	
	var setupEventListener = function(){

		var DOM = UICtrl.getDOMStrings();
		document.querySelector(DOM.inputBtn).addEventListener('click', addItem);

		document.addEventListener('keypress', function(event){

			if(event.keyCode === 13 || event.which === 13){

				addItem();
			}
		});
		document.querySelector(DOM.parent).addEventListener('click', deleteItem);

	};

	var updateBudget = function() {

		BudgetCtrl.calculateBudget();

		var budget = BudgetCtrl.getBudget();

		UICtrl.displayBudget(budget);
	}

	var updatePercentage = function(){

		BudgetCtrl.calculatePercentage();

		var per = BudgetCtrl.getPercentage();

		UICtrl.displayPercentage(per);
	}

	var addItem = function(){

		var input = UICtrl.getInput();

		if(input.description !== "" && !isNaN(input.value) && input.value > 0){

			var newItem = BudgetCtrl.addItem(input.type, input.description, input.value);
			UICtrl.addListItem(newItem, input.type);
			UICtrl.clearFields();
			updateBudget();

			updatePercentage();

		}

	};

	var deleteItem = function(event) {

		var type, itemId, splitId, id;

		itemId = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.id;

		// console.log(event.target.parentNode.parentNode.parentNode.parentNode.parentNode.id);

		if(itemId){

			splitId = itemId.split('-');
			type = splitId[0];
			id = parseInt(splitId[1]);

			BudgetCtrl.deleteItem(type, id);

			UICtrl.deleteItem(itemId, type);

			updateBudget();


			updatePercentage();
		}

	};




	return{

		init: function() {

			UICtrl.displayBudget({
				totalBudget: 0,
				totalInc: 0,
				totalExp: 0,
				percentage: -1});
			setupEventListener();
			UICtrl.displayMonth();

		}
	}


})(BudgetController, UIController);


controller.init();