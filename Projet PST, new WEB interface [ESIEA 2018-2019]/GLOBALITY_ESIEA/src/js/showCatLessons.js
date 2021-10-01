var delayInMilliseconds = 500;

function hideElement(id, delay) {
    document.getElementById(id).style.opacity = "0";
    setTimeout(function(){
        document.getElementById(id).style.display = "none";
    }, delay);
}

function showElement(id, delay) {
    document.getElementById(id).style.opacity = "1";
    setTimeout(function(){
        document.getElementById(id).style.display = "block";
    }, delay);
}

function openESIEA() {
    // ETAPE 1 : Cacher le message de la section
    hideElement('lessonsMenuMessage', 300);

    // ETAPE 2 : Déterminer si une autre section est activé et agir sur le temps en conséquence
    var stateOfESIEA = document.getElementById("openMenuESIEA");
    var stateOfOTHER = document.getElementById("openMenuOTHER");

    hideElement('openMenuOTHER', 300);
    showElement('openMenuESIEA', 300);

    console.log("\nResult of openESIEA")
    console.log("stateOfESIEA.style.display : " + stateOfESIEA.style.display);
    console.log("stateOfOTHER.style.display : " + stateOfOTHER.style.display);
}

function openOTHER() {
    // ETAPE 1 : Cacher le message de la section
    hideElement('lessonsMenuMessage', 300);

    // ETAPE 2 : Déterminer si une autre section est activé et agir sur le temps en conséquence
    var stateOfESIEA = document.getElementById("openMenuESIEA");
    var stateOfOTHER = document.getElementById("openMenuOTHER");

    hideElement('openMenuESIEA', 300);
    showElement('openMenuOTHER', 300);

    console.log("\nResult of openOTHER")
    console.log("stateOfESIEA.style.display : " + stateOfESIEA.style.display);
    console.log("stateOfOTHER.style.display : " + stateOfOTHER.style.display);
}

function closeALL() {
    hideElement('openMenuESIEA', 300);
    hideElement('openMenuOTHER', 300);
    showElement('lessonsMenuMessage', 300);
}

function dropdownInfo() {
    hideElement('drop-meca', 0);
    hideElement('drop-elec', 0);
    hideElement('drop-maths', 0);
    // hideElement('drop-info', 0);
    var info = document.getElementById('drop-info');
    if (info.style.opacity == '1') {
        hideElement('drop-meca', 0);
        hideElement('drop-elec', 0);
        hideElement('drop-maths', 0);
        hideElement('drop-info', 0);
    } else {
        showElement('drop-info', 0);
    }
}

function dropdownMeca() {
    // hideElement('drop-meca', 0);
    hideElement('drop-elec', 0);
    hideElement('drop-maths', 0);
    hideElement('drop-info', 0);
    var meca = document.getElementById('drop-meca');
    if (meca.style.opacity == '1') {
        hideElement('drop-meca', 0);
        hideElement('drop-elec', 0);
        hideElement('drop-maths', 0);
        hideElement('drop-info', 0);
    } else {
        showElement('drop-meca', 0);
    }
}

function dropdownMaths() {
    hideElement('drop-meca', 0);
    hideElement('drop-elec', 0);
    // hideElement('drop-maths', 0);
    hideElement('drop-info', 0);
    var maths = document.getElementById('drop-maths');
    if (maths.style.opacity == '1') {
        hideElement('drop-meca', 0);
        hideElement('drop-elec', 0);
        hideElement('drop-maths', 0);
        hideElement('drop-info', 0);
    } else {
        showElement('drop-maths', 0);
    }
}

function dropdownElec() {
    hideElement('drop-meca', 0);
    // hideElement('drop-elec', 0);
    hideElement('drop-maths', 0);
    hideElement('drop-info', 0);
    var elec = document.getElementById('drop-elec');
    if (elec.style.opacity == '1') {
        hideElement('drop-meca', 0);
        hideElement('drop-elec', 0);
        hideElement('drop-maths', 0);
        hideElement('drop-info', 0);
    } else {
        showElement('drop-elec', 0);
    }
}
