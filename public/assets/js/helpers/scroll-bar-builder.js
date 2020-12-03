Scrollbar.use(OverscrollPlugin);
function scrollBar(el, delegateTo = '',willHide = false){
    let options = {
        'damping': 0.1,
            'renderByPixels': true,
            'continuousScrolling': true,
            'alwaysShowTracks': willHide,
            'delegateTo': delegateTo,
            plugins: {
            overscroll: {
                effect: 'glow',
                    damping: 0.15,
                    maxOverscroll: 80,
                    glowColor: '#68848e'
            }
        }
    }
    Scrollbar.init(el, options)
}
