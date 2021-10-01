function progressValue(classProgress, maxValue, delay) {
    $(document).ready(function() {
        var value  = 0;
        var cptVal = 0;
        var i = setInterval(function() {
            $(classProgress).html(value + '%');
            value++;
            cptVal++;

            if (cptVal == maxValue + 1) {
                clearInterval(i);
            }
        }, delay);
    });
}
