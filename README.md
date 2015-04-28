# wp-magazine
Template for WordPress Magazines.

## Filters

There are filters to modify the magazine article name and slug, and the issue slug. The recommended naming convention (and filter usage) is this:

    add_filter( 'wpm_filters_article_args', 'my_article_args' );
    function my_article_args($args) {
        $args['name'] = 'New Magazine Name';
        $args['slug'] = 'new-magazine-name/article';
        return $args;
    }

    add_filter( 'wpm_filters_issue_args', 'my_issue_args' );
    function my_issue_args($args) {
        $args['slug'] = 'new-magazine-name';
        return $args;
    }

Remember to flush the permalinks after changing the slugs!

If using pretty permalinks (which you should use), the URL's will be formed as follows:

| URL                              | Location                  |
| -------------------------------- | ------------------------- |
| /new-magazine-name/              | (Main) Issue Archive      |
| /new-magazine-name/article-name/ | (Single) Magazine Article |
| /new-magazine-name/2015/         | (Year) Issue Archive      |
| /new-magazine-name/2015-01/       | (Number) Issue Archive    |
