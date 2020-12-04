let teachersNoteScrollbar = document.getElementById('teachersNoteScrollbar'),
    enrolledSubjectsScrollbar = document.querySelector('.enrolled-subjects-scrollbar'),
    teachersScrollbar = document.querySelector('.teachers__scrollbar');
scrollBar(teachersNoteScrollbar, teachersNoteScrollbar, true);
scrollBar(enrolledSubjectsScrollbar, enrolledSubjectsScrollbar, true);
scrollBar(teachersScrollbar, teachersScrollbar, true);
imgChecker.imgLoader(teachersNoteScrollbar);
imgChecker.imgLoader(teachersScrollbar);
