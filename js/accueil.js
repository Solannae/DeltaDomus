var nextImg = document.querySelector('#next-ad')
var previousImg = document.querySelector('#previous-ad')
var image = document.querySelector('#ad-image')
var imageList = ['assets/banner-img.jpg', 'assets/banner-img2.jpeg']
var iImage = 0

nextImg.addEventListener('click', function() {
	if (iImage < imageList.length-1) {
		iImage += 1;
		image.setAttribute('src', imageList[iImage]);
	}
});

previousImg.addEventListener('click', function() {
	if (iImage > 0) {
		iImage -= 1;
		image.setAttribute('src', imageList[iImage]);
	}
});