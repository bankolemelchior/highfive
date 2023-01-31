const myList = document.getElementById('myList');
const addButton = document.querySelector('#addTodo');
const input = document.querySelector('#myTodo');

class TodoList {
    constructor(element) {
        this.listElement = element;
        this.textList = [];
    }

    add(text) {
        this.textList.push(text);
        this.update();
        return this.textList;

    }

    update() {
        document.querySelectorAll('li').forEach(forLi => {
            forLi.remove();
        });
        this.textList.forEach(ele => {
            this.listElement.append(TodoList.createListItem(ele));
        });

    }

    get getText() {
        return this.textList;
    }

    static createListItem(text) {
        //to create the the li tag
        let createLi = document.createElement('li');
        createLi.textContent = text;
        //to create the remove button inside the li
        let removeButton = document.createElement('button');
        removeButton.textContent = "supp";
        removeButton.setAttribute('id', 'toDelete');
        createLi.append(removeButton);
        //to add eventListener on the remove button
        removeButton.addEventListener('click', function () {
            //This is to go through the 'textList' array
            toRemove().forEach(elemt => {
                if (elemt === text) {
                    //to get index of the element on which we've cliked and remove it
                    let indexLi = toRemove().indexOf(elemt);
                    //remove the element from the array
                    toRemove().splice(indexLi, 1);
                    //remove the element from the document
                    createLi.remove();
                };
            });
            
        });
        return createLi;
    }

};

let todoApp = new TodoList(myList);
//this line is to get the textList outsid of the class
let todoItemList = todoApp.getText;

//this is to add event on the button which add element in my todo list
addButton.addEventListener('click', function () {
    let inputValue = input.value;
    if (inputValue !== "") {
        todoApp.add(inputValue);
    } else {
        alert('veuillez remplir le champ de saisi')
    };

});
// us this to return the array on static function so as to us it for removing
function toRemove() {
    return todoItemList;
};
