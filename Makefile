production:
	hugo --gc --minify

netlify:
	mv themes/twentysixteen/layouts/robots-preview.txt themes/twentysixteen/layouts/robots.txt
	hugo --gc --minify

preview:
	mv themes/twentysixteen/layouts/robots-preview.txt themes/twentysixteen/layouts/robots.txt
	hugo --gc --minify --buildFuture -b ${DEPLOY_PRIME_URL}

branch:
	mv themes/twentysixteen/layouts/robots-preview.txt themes/twentysixteen/layouts/robots.txt
	hugo --gc --minify -b ${DEPLOY_PRIME_URL}
