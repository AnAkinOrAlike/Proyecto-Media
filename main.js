document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('colorPicker').addEventListener('change', function() {
        console.log(this.value);
        var selectedColor = this.value;
        document.getElementById('hr').style.backgroundColor = selectedColor;
        document.getElementById('mhr').style.backgroundColor = selectedColor;
        for (let i = 1; i <= 5; i++) {    
            let starId = 'star' + i;
            let element = document.getElementById(starId);
            if (element) {
                element.style.setProperty('--bg-color', selectedColor);
}}})});

    /*document.getElementById('colorPicker').addEventListener('input', function() {
    const color = window.getComputedStyle(this).getPropertyValue('background-color');
    const labels = document.querySelectorAll('.star label');
    labels.forEach(label => {
        label.style.color = color;
    });
});*/