import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: "sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true, //elimanr su imagen
    dictRemoveFile: 'borrar archivo',
    maxFiles: 3,
    uploadMultiple: false
});

dropzone.on('sending', function (file, xhr, formData) {
    console.log(file);

})

dropzone.on("success", function (file, response) {
    console.log(response);

})

dropzone.on("error", function (file, message) {
    console.log(message);
})

dropzone.on("removedfile", function () {
    ;
})