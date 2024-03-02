import { gsap } from "gsap";

function animationAlert() {
    const alerts = document.querySelector(".alert-display");
    if (!alerts)
        return;
    const tlAlertAnimation = gsap.timeline();
    tlAlertAnimation.to(".alert-display", { opacity: 1, right: "5%", x: 0, duration: 1 });
    tlAlertAnimation.to(".alert-display", { opacity: 0, x: "100%", right: 0, duration: 1, delay: 4 });
}

animationAlert();