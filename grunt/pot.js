module.exports = {

	options: {
		text_domain: 'wp-magazine',
		dest: 'languages/',
		encoding: 'UTF-8',
		keywords: [
			'__',
			'_e',
			'_x',
			'_n',
			'_ex',
			'_nx',
			'esc_attr__',
			'esc_attr_e',
			'esc_attr_x',
			'esc_html__',
			'esc_html_e',
			'esc_html_x',
			'_nx_noop'
		],
	},

	files: {
		src: [ 'includes/**/*.php' ],
		expand: true,
	},
};