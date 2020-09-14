var player = videojs('videoPlayer', {
	autoplay: 'muted',
	controls: true,
	poster: 'https://picsum.photos/800/450',
	loop: true,
	//fluid: true,
	//aspectRatio: '4:3',
	playbackRates: [0.25, 0.5, 1, 1.25, 1.5, 1.75],
	plugins: {
		hotkeys: {
			enableModifiersForNumbers: false,
			seekStep: 30
		}
	}

});