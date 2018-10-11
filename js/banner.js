let banner = document.querySelectorAll(".img");
let item = document.querySelectorAll(".item");
let next = e = z = n = 0;
let flag = true;
$(".imgText").hide();
for (let m = 0; m < item.length; m++) {
    $(`.item:nth-child(${m+1})`).on("click",function () {
        for (let i = 0; i < banner.length; i++) {
            $(".img img").removeClass("next");
            $(".img img").removeClass("now");
            $(`.item:nth-child(${i+1})`).css({"opacity":"0.5"});
            flag = true;
        }
        if (flag === false) {
            return 0;
        } else {
            flag = !flag;
            $(`.img:nth-child(${e}) img`).addClass("now");
            $(`.img:nth-child(${m+1}) img`).addClass("next");
            $(`.img:nth-child(${m+1})`).css({"z-index":`${z++}`});
            $(`.item:nth-child(${m+1})`).css({"opacity":"1"});
            n = m;
            next=m;
        }
    });
}

let t = setInterval(move, 5000);

function move() {
    for (let i = 0; i < banner.length; i++) {
            $(".img img").removeClass("next");
            $(".img img").removeClass("now");
            $(`.img:nth-child(${i + 1}) .imgText`).slideUp();
            $(`.item:nth-child(${i + 1})`).css({"opacity": "0.5"});
    }
    if (next === banner.length) {
        next = 0;
    }
    $(`.img:nth-child(${e+1})  img`).addClass("now");
    $(`.img:nth-child(${next+1}) img`).addClass("next");
    $(`.img:nth-child(${next+1})`).css({"z-index":`${z++}`});
    $(`.item:nth-child(${next+1})`).css({"opacity":"1"});
    e = next;
    next++;
}

$(".banner").mouseenter(function () {
    $(`.imgText`).slideDown();
    clearInterval(t);
        for (let i = 0; i < banner.length; i++) {
            $(".img img").removeClass("next");
            $(".img img").removeClass("now");
            $(`.img:nth-child(${i+1}) .imgText`).slideUp();
            $(`.item:nth-child(${i+1})`).css({"opacity":"0.5"});
        }
});
$(".banner").mouseleave(function () {
    t = setInterval(move, 5000);
    $(".imgText").slideUp(1000);
});