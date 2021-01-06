$(document).ready(function() {
    const formInputs = $("div.form-group > div.input-group > input, div.form-group > select, div.form-group > textarea");
    const techniqueCheckboxes = $("div.form-group > div.form-check > input");
    const fileInput = $("input#picture");
    const saveChangesButton = $("button#save-settings");
    const abortChangesButton = $("button#abort-changes");

    const editButton = $("button#edit-print");
    const editButtonIcon = $("button#edit-print > img");
    const pencilIcon = "upload/icons/pencil-square.svg";

    $("button#edit-print").click(function(e) {        
        e.preventDefault();
        if (editButtonIcon.attr("src") == pencilIcon) {
            editButton.hide();
            showEnableButtons(saveChangesButton, abortChangesButton);
            unlockForm(formInputs, fileInput, techniqueCheckboxes);
        } else {
            editButton.show();
            hideDisableButtons(saveChangesButton, abortChangesButton);
            lockForm(formInputs, fileInput, techniqueCheckboxes);
        }
    });

    abortChangesButton.click(function() {
        location.reload();
    });
});

function lockForm(formInputs, fileInput, techniqueCheckboxes) {
    formInputs.attr("readonly", true);
    fileInput.attr("disabled", true);
    techniqueCheckboxes.attr("disabled", true);
}

function unlockForm(formInputs, fileInput, techniqueCheckboxes) {
    formInputs.attr("readonly", false);
    fileInput.attr("disabled", false);
    techniqueCheckboxes.attr("disabled", false);
}

function showEnableButtons(saveChangesButton, abortChangesButton) {
    saveChangesButton.removeClass("d-none");
    saveChangesButton.attr("disabled", false);
    abortChangesButton.removeClass("d-none");
    abortChangesButton.attr("disabled", false);
}

function hideDisableButtons(saveChangesButton, abortChangesButton) {
    saveChangesButton.addClass("d-none");
    saveChangesButton.attr("disabled", true);
    abortChangesButton.addClass("d-none");
    abortChangesButton.attr("disabled", true);
}
