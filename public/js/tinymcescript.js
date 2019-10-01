tinymce.init({
	selector: '#textarea-tinymce',
	menubar: false,
	plugins: 'image, link, lists, emoticons',
	branding: false,
});

tinymce.init({
	selector: '#comment-tinymce',
	menubar: false,
	// toolbar : 'bold,italic,image, link, emoticons',
	plugins: 'image, link, emoticons',
	branding: false,
});

tinymce.init({
	selector: '#editcomment-tinymce',
	menubar: false,
	// toolbar : 'bold,italic,image, link, emoticons',
	plugins: 'image, link, emoticons',
	branding: false,
});