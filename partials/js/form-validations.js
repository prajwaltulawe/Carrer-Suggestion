function sectionValidation(sectionId){
    var isValid;    
    var quesName = document.getElementById(`sec-${sectionId}-1`).name;
    var selectedOpt = document.querySelector(`input[name="${quesName}"]:checked`).value;
    if (selectedOpt) {
        isValid = true;
    }

    return isValid;
}