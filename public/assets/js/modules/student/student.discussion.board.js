let discussionBoardContainer = document.querySelector('.discussion-board__main-container');
imgChecker.imgLoader(discussionBoardContainer);

let smoothScroll = new scrollToSmooth('#replyBttnSection', {
    targetAttribute: 'href',
    duration: 1200,
    easing: 'easeInOutCubic',
});
smoothScroll.init();

