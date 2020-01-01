verschwoerhaus.de
=================

the new website for the verschwörhaus. now based on [hugo](https://gohugo.io), a static site generator.

all the content from the old wordpress website is migrated.

pre
---
Install [Hugo](https://gohugo.io) (Version ≥ 0.60.1):

https://gohugo.io/getting-started/installing


how to blog
-----------

Create a new file in `content/posts`, named `yyyy-mm-dd-slug.md`, for example `2016-07-01-macht-hoch-die-tuer.md`.

**You may use `hugo new` for that**, because this provides you with an nice template for your post: `hugo new posts/2020-01-02-my-post.md`

### For the translation:

Create a identically named file, but with the suffix `.en.md`, eg `2016-07-01-macht-hoch-die-tuer.en.md`.

In the frontmatter of this file, you have to set the url and the language like this:
```
url: /en/macht-hoch-die-tuer/
language: en
```


how to build
------------

locally, to preview your new post: `hugo serve`



TODO
----
- [x] fix figures 
- [x] fix youtube embeds
- [x] look for other shortcodes
- [ ] diff urls, something breaking?
- [ ] fork theme, add our modifications
- [x] build spaceapi microservice
- [x] integrate spaceapi status js
- [x] data for library
- [x] translate all static pages
- [x] import translated posts (else: https://github.com/gohugoio/hugo/issues/2529)
- [x] jh lab page is a category page
- [ ] don't embed external images
- [ ] look at rss
- [x] i18n date
