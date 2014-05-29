/**
 * Created by Kate on 5/26/14.
 */

//for story
var SlideCount = $('#storySlider .sliderli').length;
var SlideWidth = $('#storySlider .sliderli').width();
var SlideHeight = $('#storySlider .sliderli').height();
var SliderUlWidth = SlideCount * SlideWidth;
$('#storySlider').css({ width: SlideWidth, height: SlideHeight });
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

function moveLeft() {
    if(sCurPage > 1){

        $('#storySlider .sliderul').animate({
            left: + SlideWidth
        }, 200, function () {
            $('#storySlider .sliderul .sliderli:last-child').prependTo('#storySlider .sliderul');
            $('#storySlider .sliderul').css('left', '');
        });
        sCurPage--;
    }
};

function moveRight() {
    if(sCurPage < SlideCount){

        $('#storySlider .sliderul').animate({
            left: - SlideWidth
        }, 200, function () {
            $('#storySlider .sliderul .sliderli:first-child').appendTo('#storySlider .sliderul');
            $('#storySlider .sliderul').css('left', '');
        });
        sCurPage++;
    }else{
        $('#storySlider').toggleClass("hidden");
        $('#questionSlider').toggleClass("hidden");

    }
};

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
        $('#questionSlider').toggleClass("hidden");
        alert("Yay! You did it!");
    }
};

$(document).ready(function(){
    $('#questionSlider a.control_next').click(function () {
        qMoveRight();
    });

    $('#storySlider a.control_prev').click(function () {
        moveLeft();
    });

    $('#storySlider a.control_next').click(function () {
        moveRight();
    });
});