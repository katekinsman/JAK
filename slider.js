/**
 * Created by Kate on 5/26/14.
 */
/*var SECTION = 1;

function getPrevious(){
    if(SECTION == 1){
        SECTION = 11;
    }else{
        SECTION --;
    }

    var file = 's' + SECTION + '.html';
    if(SECTION < 12){

    }
}

function getNext(){
    if(SECTION == 11){
        SECTION = 1;
    }else{
        SECTION ++;
    }
    var file = 's' + SECTION + '.html';
    if(SECTION < 12){

    }
}

function injectNext(data){
    var newSection = $('<div>', {'id': 'desc'}).html(data);
    $('#desc').replaceWith(newSection);
}
function injectPrevious(data){
    var newSection = $('<div>', {'id': 'desc'}).html(data);
    $('#desc').replaceWith(newSection);
}*/

var slideCount = $('#sliderul .sliderli').length;
var slideWidth = $('#sliderul .sliderli').width();
var slideHeight = $('#sliderul .sliderli').height();
var sliderUlWidth = slideCount * slideWidth;

$('#slider').css({ width: slideWidth, height: slideHeight });

$('#sliderul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

$('#sliderul .sliderli:last-child').prependTo('#sliderul');

function moveLeft() {
    $('#sliderul').animate({
        left: + slideWidth
    }, 200, function () {
        $('#sliderul .sliderli:last-child').prependTo('#sliderul');
        $('#sliderul').css('left', '');
    });
    //getPrevious();
};

function moveRight() {
    $('#sliderul').animate({
        left: - slideWidth
    }, 200, function () {
        $('#sliderul .sliderli:first-child').appendTo('#sliderul');
        $('#sliderul').css('left', '');
    });
    //getNext();
};

$(document).ready(function(){
    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });
});