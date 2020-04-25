var state = false
document.getElementById('mobileMenuBtn').addEventListener('click', function () {
    var displays = ["flex", "none"];
    document.getElementById('mobileMenu').style.display = displays[+state];
    state = !state;
});