let teachersNoteScrollbar = document.getElementById('teachersNoteScrollbar'),
    enrolledSubjectsScrollbar = document.querySelector('.enrolled-subjects-scrollbar'),
    teachersScrollbar = document.querySelector('.teachers__scrollbar');
scrollBar(teachersNoteScrollbar, teachersNoteScrollbar, true);
scrollBar(enrolledSubjectsScrollbar, enrolledSubjectsScrollbar, true);
imgChecker.imgLoader(teachersNoteScrollbar);
