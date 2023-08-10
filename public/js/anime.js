// anime Js
const text = document.querySelector(".text");

text.innerHTML = text.textContent.replace(/\S/g, "<span>$&</span>");

const animation = anime.timeline({
    targets: ".text span",
    easing: "easeInOutExpo",
    loop: false,
});
animation
    .add({
        targets: ".text span",
        opacity: [0, 0], // Add opacity animation from 0 to 1
        rotate: function () {
            return anime.random(-360, 360);
        },
        translateX: function () {
            return anime.random(-360, 360);
        },
        translateY: function () {
            return anime.random(-360, 360);
        },
        duration: 0,
        delay: anime.stagger(0),
    })
    .add({
        opacity: [0, 1], // Add opacity animation from 0 to 1
        rotate: 0,
        translateX: 0,
        translateY: 0,
        duration: 2000,
        delay: anime.stagger(10),
    }).complete = function () {
    const spans = document.querySelectorAll(".text span");
    spans.forEach(function (span) {
        span.style.display = "inline";
    });
};

// home fade in
const section = document.querySelector(".section-1");
section.style.opacity = "0";

setTimeout(() => {
    section.style.transition = "opacity 2s ease-out";
    section.style.opacity = "1";
}, 100);

$(".slider").each(function () {
    var $this = $(this);
    var $group = $this.find(".slide_group");
    var $slides = $this.find(".slide");
    var bulletArray = [];
    var currentIndex = 0;
    var timeout;

    function move(newIndex) {
        var animateLeft, slideLeft;

        advance();

        if ($group.is(":animated") || currentIndex === newIndex) {
            return;
        }

        bulletArray[currentIndex].removeClass("active");
        bulletArray[newIndex].addClass("active");

        if (newIndex > currentIndex) {
            slideLeft = "100%";
            animateLeft = "-100%";
        } else {
            slideLeft = "-100%";
            animateLeft = "100%";
        }

        $slides.eq(newIndex).css({
            display: "block",
            left: slideLeft,
        });
        $group.animate(
            {
                left: animateLeft,
            },
            function () {
                $slides.eq(currentIndex).css({
                    display: "none",
                });
                $slides.eq(newIndex).css({
                    left: 0,
                });
                $group.css({
                    left: 0,
                });
                currentIndex = newIndex;
            }
        );
    }

    function advance() {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            if (currentIndex < $slides.length - 1) {
                move(currentIndex + 1);
            } else {
                move(0);
            }
        }, 4000);
    }

    $(".next_btn").on("click", function () {
        if (currentIndex < $slides.length - 1) {
            move(currentIndex + 1);
        } else {
            move(0);
        }
    });

    $(".previous_btn").on("click", function () {
        if (currentIndex !== 0) {
            move(currentIndex - 1);
        } else {
            move(3);
        }
    });

    $.each($slides, function (index) {
        var $button = $('<a class="slide_btn">&bull;</a>');

        if (index === currentIndex) {
            $button.addClass("active");
        }
        $button
            .on("click", function () {
                move(index);
            })
            .appendTo(".slide_buttons");
        bulletArray.push($button);
    });

    advance();
});
