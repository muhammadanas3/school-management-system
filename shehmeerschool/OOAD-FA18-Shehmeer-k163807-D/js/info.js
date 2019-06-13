
var DatabaseController = (function(){

    var Teacher = function(id, name, fname, qualification, gender, cnic, salary, des){
        this.id = id;
        this.name = name;
        this.fname = fname;
        this.qualification = qualification;
        this.gender = gender;
        this.cnic = cnic;
        this.salary = salary;
        this.des = des;
    };

    var data = {

        info : {
            teacher: []
        },
        total: {
            teacherCount : 0
        }
    };
    return{

        addTeacher: function(name, fname, qualification, gender, cnic, salary, des){
            var newTeacher, id;

            if(data.info.teacher.length == 0){
                id = 1;
            }
            else{
                id = data.info.teacher[data.info.teacher.length-1].id +1;
            }
            
            newTeacher = new Teacher(id, name, fname, qualification, gender, cnic, salary, des);
            data.info.teacher.push(newTeacher);
            // console.log(des);
            return newTeacher;
        },
        getDataBase: function(){
            return data;
        }

    };
})();

var UIController = (function(){

    var DomStrings = {

        Male: 'male',
        Female: 'female',
        Name: '.Names',
        FatherName: '.FNames',
        Qualification: '.Qualifications',
        Cnic: '.cnic',
        designation: '.des',
        salary: '.sal',
        addButton: '.add-button',
        teacherList: 'teacher-table'
    };

    
    
    return {

        getInput: function(){

            var gender;
            if(document.getElementById(DomStrings.Male).checked)
                gender = document.getElementById(DomStrings.Male).value;
            else if(document.getElementById(DomStrings.Female).checked)
                gender = document.getElementById(DomStrings.Female).value
            return{
                name: document.querySelector(DomStrings.Name).value,
                gender,
                fatherName: document.querySelector(DomStrings.FatherName).value,
                qualification: document.querySelector(DomStrings.Qualification).value,
                cnic: document.querySelector(DomStrings.Cnic).value,
                des: document.querySelector(DomStrings.designation).value,
                salary: document.querySelector(DomStrings.salary).value,
                
            };
            
        },

        addTeacherList: function(teacher){

            var list = document.getElementById(DomStrings.teacherList);
            var row = list.insertRow(teacher.id);
            row.insertCell(0).innerHTML = teacher.id;
            row.insertCell(1).innerHTML = '<a href="" data-toggle="modal" data-target="#teaching-staff-modal" style="color:black; text-decoration:none;">' +teacher.name + '</a>';
            row.insertCell(2).innerHTML = teacher.des;
            
        },

        getDOMStrings: function(){
            return DomStrings;
        },
        
    };

})();

var Controller = (function(UICtrl, DBCtrl){

    var setupEventListener = function(){

        var DOM = UICtrl.getDOMStrings();
        document.querySelector(DOM.addButton).addEventListener('click', ctrlAddItem);
        document.addEventListener('keypress', function(event){

            if(event.keyCode === 13 || event.which === 13){
                ctrlAddItem();
            }
        });

    }

    var ctrlAddItem = function(){

        var input = UICtrl.getInput();
        var newTeacher = DBCtrl.addTeacher(input.name, input.fatherName, input.qualification,input.gender, input.cnic, input.salary, input.des);
        console.log(newTeacher);

        UICtrl.addTeacherList(newTeacher);
    }

    return{

        init: function(){
            console.log('app started');
            setupEventListener();
        },
        getDBCtrl: function(){
            return DBCtrl;
        }
    };
    

})(UIController, DatabaseController);

Controller.init();