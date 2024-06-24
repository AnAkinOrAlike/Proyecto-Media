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

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.box').forEach(function(box) {
        const starValue = box.getAttribute('data-star');
        const radioInputs = box.querySelectorAll('input[name="estrellas"]');
        
        function updateStarStyle(radioInput) {
            const labels = radioInput.parentNode.querySelectorAll('label');
            labels.forEach(function(label, index) {
                if (index + 1 <= starValue) {
                    label.style.backgroundColor = '#a25b44';
                    label.style.color = 'white';
                } else {
                    label.style.backgroundColor = '';
                    label.style.color = '';
                }
            });
        }
        radioInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                updateStarStyle(this);
            });
        });
        radioInputs[0].dispatchEvent(new Event('change'));
    });
});