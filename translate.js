/* global $ */
var defs_verbs = {};
var official_verb;
var tense;
var mood;
var conjugations = [];
var show = false;
var definition;

$(document).ready(function() {
    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    official_verb = $_GET['verbo'];
    tense = $_GET['tiempo'];
    mood = $_GET['modo'];
    prepareVerbs();

    $('#check_correct').click(askForVerb);
    $('#i_dunno').click(showAnswers);
});



function askForVerb() {

    $.ajax({
        url: 'translate.php',
        type: 'GET',
        data: {
            verb: official_verb,
            tense: tense,
            mood: mood
        },
        success: function(data) {
            setConjugations(JSON.parse(data));
            if (show) {
                for (var i = 1; i <= 5; i++) {
                    $('#ans' + i).text(conjugations[i - 1]);
                }
            }
        }
    });
}


function prepareVerbs() {
    $.get('definitions-verbs.txt', function(data) {
        var lines = data.split('\n');
        lines.forEach(function(word) {
            var words = word.split(" ");
            words.splice(0, 1);
            var verb = words.splice(words.length - 1);
            defs_verbs[verb[0]] = words.join(" ");
        });
        official_verb = pickRandomProperty(defs_verbs);
        definition = defs_verbs[official_verb];

        var moood;
        if (mood == 1) {
            moood = "indicativo";
        }
        if (mood == 2) {
            moood = "subjunctivo";
        }
        $('#header').text(official_verb + ' - ' + moood + ' - ' + tense);
        $("#def").text(definition);

    }, 'text');

}

function pickRandomProperty(obj) {
    console.log(obj);
    var result;
    var count = 0;
    for (var prop in obj)
        if (Math.random() < 1 / ++count)
            result = prop;

        // console.log(result.charAt(result.length - 1));
    if (result.charAt(result.length - 1) != 'r') {
        return pickRandomProperty(obj);
    }
    return result;
}

function setConjugations(obj) {
    for (var i = 1; i <= 11; i += 2) {
        if (i == 9) {
            continue;
        }
        obj[i] = obj[i].replace('&Atilde;&iexcl;', 'a');
        obj[i] = obj[i].replace('&Atilde;&shy;', 'i');
        obj[i] = obj[i].replace('&Atilde;&copy', 'e');
        obj[i] = obj[i].replace('&Atilde;&frac14;', 'u');

        conjugations.push(obj[i]);
    }
    console.log(conjugations);


    for (var i = 1; i <= 5; i++) {
        console.log($('#pro' + i).val() + "---" + conjugations[i - 1]);
        if ($('#pro' + i).val() == conjugations[i - 1]) {
            $('#pro' + i).css({
                "background-color": "#80ffbf"
            });
        }
        else {
            $('#pro' + i).css({
                "background-color": "#ff9999"
            });
        }
    }


}

function showAnswers() {
    show = true;
    askForVerb();
}
