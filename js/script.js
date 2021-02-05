window.addEventListener('load', function() {
	const picture = document.querySelector("#cover");
	makeShadow(picture);
});

function getAverageRGB(cover) {
	const rgb = {r: 0, g: 0, b: 0};
    const canvas = document.createElement('canvas');
	const ctx = canvas.getContext('2d');

	if (!ctx) {
		return rgb;
	}

	const width = canvas.width = cover.offsetWidth;
	const height = canvas.height = cover.offsetHeight;

    let pixels;
	ctx.drawImage(cover, 0, 0);

	try	{
		pixels = ctx.getImageData(0, 0, width, height);
	} catch(e) {
		return rgb;
	}

	let length = pixels.data.length;

	for (i = 0; i + 4 * 5 <= length; i += 4 * 5) {
		rgb.r += pixels.data[i];
		rgb.g += pixels.data[i + 1];
		rgb.b += pixels.data[i + 2];
	}

	let pixCount = length / (4 * 5);

	rgb.r = ~~(rgb.r / pixCount);
	rgb.g = ~~(rgb.g / pixCount);
	rgb.b = ~~(rgb.b / pixCount);

	return rgb;
}


function makeShadow (picture) {
	const rgb = getAverageRGB(picture);
	picture.style.boxShadow = `0 0 200px 75px rgb(${rgb.r}, ${rgb.g}, ${rgb.b})`;
}
