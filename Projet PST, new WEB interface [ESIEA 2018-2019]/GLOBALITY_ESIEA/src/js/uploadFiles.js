$(document).ready(function() {
    $('#fileLessonS1').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-fileLessonS1').text(files.length + " fichiers");
        } else {
            $('#span-fileLessonS1').text(files.length + " fichier");
        }
    });

    $('#fileLessonS2').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-fileLessonS2').text(files.length + " fichiers");
        } else {
            $('#span-fileLessonS2').text(files.length + " fichier");
        }
    });

    $('#fileTDS1').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-fileTDS1').text(files.length + " fichiers");
        } else {
            $('#span-fileTDS1').text(files.length + " fichier");
        }
    });

    $('#fileTDS2').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-fileTDS2').text(files.length + " fichiers");
        } else {
            $('#span-fileTDS2').text(files.length + " fichier");
        }
    });

    $('#fileTPS1').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-fileTPS1').text(files.length + " fichiers");
        } else {
            $('#span-fileTPS1').text(files.length + " fichier");
        }
    });

    $('#fileTPS2').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-fileTPS2').text(files.length + " fichiers");
        } else {
            $('#span-fileTPS2').text(files.length + " fichier");
        }
    });

    $('#fileProjects').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-fileProjects').text(files.length + " fichiers");
        } else {
            $('#span-fileProjects').text(files.length + " fichier");
        }
    });

    $('#filePerso').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-filePerso').text(files.length + " fichiers");
        } else {
            $('#span-filePerso').text(files.length + " fichier");
        }
    });

    $('#input-logoPST').on('change', function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $('#span-logoPST').text("Logo séléctionné");
        } else {
            $('#span-logoPST').text("Logo séléctionné");
        }
    });
});
