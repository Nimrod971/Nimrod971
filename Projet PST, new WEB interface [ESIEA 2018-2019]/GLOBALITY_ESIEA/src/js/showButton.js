console.log('connect to showButton.js\n');
var delayInMilliseconds = 500;

function showElement(id, delay) {
    document.getElementById(id).style.opacity = "1";
    setTimeout(function(){
        document.getElementById(id).style.display = "block";
    }, delay);
}

function hideElement(id, delay) {
    document.getElementById(id).style.opacity = "0";
    setTimeout(function(){
        document.getElementById(id).style.display = "none";
    }, delay);
}

function showCalendar() {
    hideElement('newEvent', 300);
    hideElement('getDate', 300);
    showElement('calendar', 300);
}

function showAddEvent() {
    console.log('enter in showAddEvent\n');
    var stateOfAddEvent = document.getElementById('newEvent');

    if (stateOfAddEvent.style.display == 'none') {
        showElement('calendar', 300);
        showElement('newEvent', 300);
        hideElement('getDate', 300);
    } else {
        showElement('calendar', 300);
        hideElement('newEvent', 300);
        hideElement('getDate', 300);
    }
}

function showGetDate() {
    var stateOfGetDate  = document.getElementById('getDate');
    document.getElementById('calendar').animation = "none";

    if (stateOfGetDate.style.display == 'none') {
        hideElement('newEvent', 300);
        hideElement('calendar', 300);
        showElement('getDate', 300);
    } else {
        hideElement('newEvent', 300);
        showElement('calendar', 300);
        hideElement('getDate', 300);
    }
}

function showModifEvent() {
    console.log('enter in showModifEvent\n');
    var stateOfModifEvent  = document.getElementById('blockModif');
    var stateOfInfoEvent   = document.getElementById('infoEvent');

    if (stateOfModifEvent.style.display == 'none') {
        console.log('display --> true\n');
        showElement('blockModif', 300);
    } else {
        console.log('display --> false\n');
        hideElement('blockModif', 300);
    }
}

function showNewLocalEvent() {
    console.log('enter in showNewLocalEvent !\n');
    var stateOfNewLocalEvent = document.getElementById('newLocalEvent');

    if (stateOfNewLocalEvent.style.display == 'none') {
        console.log('show newLocalEvent !\n');
        showElement('newLocalEvent', 300);
    } else {
        console.log('hide newLocalEvent !\n');
        hideElement('newLocalEvent', 300);
    }
}

function showAddLink() {
    console.log("enter in showAddLink !\n");
    var stateOfAddLink = document.getElementById('addLink');

    if (stateOfAddLink.style.display == 'none') {
        console.log('show addLink !\n');
        showElement('addLink', 300);
    } else {
        console.log('hide addLink !\n');
        hideElement('addLink', 300);
    }
}

function showAddPST2() {
    console.log('Enter in showAddPST2 !\n');
    var stateOfAddProject = document.getElementById('addPST2');

    if (stateOfAddProject.style.display == 'none') {
        console.log('show addProject !\n');
        showElement('addPST2', 300);
        hideElement('addPST3', 300);
        hideElement('addPST4', 300);
        hideElement('addPST5', 300);
    } else {
        console.log('hide addProject !\n');
        hideElement('addPST2', 300);
        hideElement('addPST3', 300);
        hideElement('addPST4', 300);
        hideElement('addPST5', 300);
    }
}

function showAddPST3() {
    console.log('Enter in showAddPST2 !\n');
    var stateOfAddProject = document.getElementById('addPST3');

    if (stateOfAddProject.style.display == 'none') {
        console.log('show addProject !\n');
        showElement('addPST3', 300);
        hideElement('addPST2', 300);
        hideElement('addPST4', 300);
        hideElement('addPST5', 300);
    } else {
        console.log('hide addProject !\n');
        hideElement('addPST2', 300);
        hideElement('addPST3', 300);
        hideElement('addPST4', 300);
        hideElement('addPST5', 300);
    }
}

function showAddPST4() {
    console.log('Enter in showAddPST4 !\n');
    var stateOfAddProject = document.getElementById('addPST4');

    if (stateOfAddProject.style.display == 'none') {
        console.log('show addProject !\n');
        showElement('addPST4', 300);
        hideElement('addPST2', 300);
        hideElement('addPST3', 300);
        hideElement('addPST5', 300);
    } else {
        console.log('hide addProject !\n');
        hideElement('addPST2', 300);
        hideElement('addPST3', 300);
        hideElement('addPST4', 300);
        hideElement('addPST5', 300);
    }
}

function showAddPST5() {
    console.log('Enter in showAddPST5 !\n');
    var stateOfAddProject = document.getElementById('addPST5');

    if (stateOfAddProject.style.display == 'none') {
        console.log('show addProject !\n');
        showElement('addPST5', 300);
        hideElement('addPST2', 300);
        hideElement('addPST3', 300);
        hideElement('addPST4', 300);
    } else {
        console.log('hide addProject !\n');
        hideElement('addPST2', 300);
        hideElement('addPST3', 300);
        hideElement('addPST4', 300);
        hideElement('addPST5', 300);
    }
}

function showSearchProjects() {
    console.log('Enter in searchProject !\n');
    var stateOfSearchProject = document.getElementById('searchProject');

    if (stateOfSearchProject.style.display == 'none') {
        console.log('show searchProject !\n');
        showElement('searchProject', 300);
        hideElement('addProject', 300);
    } else {
        console.log('hide searchProject !\n');
        hideElement('searchProject', 300);
        hideElement('addProject', 300);
    }
}

function showInfoPST() {
    console.log('Enter in showInfoPST !\n');
    var stateOfInfoPST = document.getElementById('infoPST');

    if (stateOfInfoPST.style.display == 'none') {
        console.log('show showInfoPST !\n');
        showElement('infoPST', 300);
    } else {
        console.log('hide showInfoPST !\n');
        hideElement('infoPST', 300);
    }
}

function showDocuments() {
    console.log('Enter in showDocument !\n');
    var stateOfDocument = document.getElementById('documents');

    if (stateOfDocument.style.display == 'none') {
        console.log('show showDocument !\n');
        showElement('documents', 300);
        hideElement('pictures', 300);
    }
}

function showPictures() {
    console.log('Enter in showPictures !\n');
    var stateOfDocument = document.getElementById('pictures');

    if (stateOfDocument.style.display == 'none') {
        console.log('show showPictures !\n');
        showElement('pictures', 300);
        hideElement('documents', 300);
    }
}

function clsPop() {
    console.log('Enter in clsPop !\n');
    var stateOfPop = document.getElementById('pop');

    if (stateOfPop.style.display == 'block') {
        console.log('hide clsPop !\n');
        hideElement('pop', 300);
    }
}

function showAction() {
    console.log('Enter in showAction !\n');
    var lastAction = document.getElementById('lastAction');

    if (lastAction.style.display == 'none') {
        console.log('show showAction !\n');
        showElement('lastAction', 300);
    } else {
        console.log('hide showAction !\n');
        hideElement('lastAction', 300);
    }
}
