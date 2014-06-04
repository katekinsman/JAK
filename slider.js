/**
 * Created by Kate on 5/26/14. Also Ashley has hijacked this script to make some edits.
 */


//for story
var SlideCount = $('#storySlider .sliderli').length;
var SlideWidth = $('#storySlider .sliderli').width();
var SlideHeight = $('#storySlider .sliderli').height();
var SliderUlWidth = SlideCount * SlideWidth;
$('#storySlider').css({ width: SlideWidth, height: SlideHeight});
$('#storySlider .sliderul').css({ width: SliderUlWidth, marginLeft: - SlideWidth });
$('#storySlider .sliderul .sliderli:last-child').prependTo('#storySlider .sliderul');
var sCurPage = 1;


//for questions
var qSlideCount = $('#questionSlider .sliderli').length;
var qSlideWidth = $('#questionSlider .sliderli').width();
var qSlideHeight = $('#questionSlider .sliderli').height();
var qSliderUlWidth = qSlideCount * qSlideWidth;
$('#questionSlider').css({ width: qSlideWidth, height: qSlideHeight });
$('#questionSlider .sliderul').css({ width: qSliderUlWidth, marginLeft: - qSlideWidth });
$('#questionSlider .sliderul .sliderli:last-child').prependTo('#questionSlider .sliderul');
var qCurPage = 1;
$('#questionSlider').toggleClass("hidden");


function sMoveLeft() {
    if(sCurPage > 1){
        $('#storySlider .sliderul').animate({
            left: + SlideWidth
        }, 200, function () {
            $('#storySlider .sliderul .sliderli:last-child').prependTo('#storySlider .sliderul');
            $('#storySlider .sliderul').css('left', '');
        });
        sCurPage--;
    }
}

function sMoveRight() {
    if(sCurPage < SlideCount){
        $('#storySlider .sliderul').animate({
            left: - SlideWidth
        }, 200, function () {
            $('#storySlider .sliderul .sliderli:first-child').appendTo('#storySlider .sliderul');
            $('#storySlider .sliderul').css('left', '');
        });
        sCurPage++;
    }else{
        //story has ended. hide story, show questions
        $('#storySlider').toggleClass("hidden");
        $('#questionSlider').toggleClass("hidden");

        // finds theme in URL
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null){
               return null;
            }
            else{
               return results[1] || 0;
            }
        };
    
        var currenttheme = $.urlParam('theme');
        
        $.ajax({
            url: "studentbeginquestions.php",
            dataType: "html",
            data: {theme: currenttheme},
            success: function(responseHTML){
                $('#answerModal .modal-body').html(responseHTML);
                $('#answerModal').modal({show: true});
            }
        });

    }
}

function checkAnswer(){
    var curInput = "#" + qCurPage + " input:radio[name=answers]:checked";

    // finds theme in URL
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
           return null;
        }
        else{
           return results[1] || 0;
        }
    };
    
    var currenttheme = $.urlParam('theme');

    $.ajax({
        type: "POST",
        url: "studentAnswer.php",
        dataType: "html",
        data: {answers: $(curInput).val(), theme: currenttheme},
        success: function(responseHTML){
            $('#answerModal .modal-body').html(responseHTML);
            $('#answerModal').modal({show: true});
            if(responseHTML.indexOf("You") == 0){
                qMoveRight();
            }
        }
    });

//    $('#answerModal').modal({show: true});
}

function qMoveRight() {
    if(qCurPage < qSlideCount){
        $('#questionSlider .sliderul').animate({
            left: - qSlideWidth
        }, 200, function () {
            $('#questionSlider .sliderul .sliderli:first-child').appendTo('#questionSlider .sliderul');
            $('#questionSlider .sliderul').css('left', '');
        });
        qCurPage++;
    }else{
        //questions have ended. hide questions, display modal
        $('#questionSlider').toggleClass("hidden");

        // finds theme in URL
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null){
               return null;
            }
            else{
               return results[1] || 0;
            }
        };
        var currenttheme = $.urlParam('theme');

        $.ajax({
            url: "studentCoins.php",
            dataType: "html",
            data: {theme: currenttheme},
            success: function(responseHTML){
                $('#answerModal .modal-body').html(responseHTML);
                $('#answerModal').modal({show: true});
            }
        });

    }
}

$(document).ready(function(){

    $('#questionSlider a.control_next').click(function () {
        checkAnswer();
    });

    $('#storySlider a.control_prev').click(function () {
        sMoveLeft();
    });

    $('#storySlider a.control_next').click(function () {
        sMoveRight();
    });

});