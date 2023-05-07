temporaerhaus.de
=================

The new website for the Temporärhaus. Now based on [Hugo](https://gohugo.io), a static site generator. All the content from the old wordpress website is migrated.

## How to blog

### Option 1: Using User Interface (Netlify CMS)

#### Prerequisites

* GitHub account with write access to this repository

#### Writing

* Visit [vshde.netlify.app/admin](https://vshde.netlify.app/admin) and sign in with your GitHub account.
* Click `New Post` and enjoy writing.
* Hit `Publish` when the post is ready.
* If you leave the english translation blank, but still want the german version being displayed on the english website, you will have to create a symlink in the `content/posts` directory (see below).

### Option 2: Using Git

#### Prerequisites

* GitHub account with write access to this repository
* Install [Hugo](https://gohugo.io) (Version ≥ 0.60.1). The detailed installation steps vary depending on your system: https://gohugo.io/getting-started/installing

#### Writing

* Create a new file in `content/posts`, named `yyyy-mm-dd-slug.de.md`, for example `2016-07-01-macht-hoch-die-tuer.de.md`. **You may use `hugo new` for that**, because this provides you with a nice template for your post: `hugo new posts/2016-07-01-macht-hoch-die-tuer.de.md`
* To preview your post, run Hugo development server locally: `hugo server`. The initial build process may take a while. After that, Hugo should reload all changes automatically.
* Media files are to be stored in the `static/wp-content/uploads/yyyy/mm` directory (for backwards compability with wordpress)

#### Translating

* The english translation of the post goes into a identically named file, but with the suffix `.en.md` instead of `.de.md`, e.g. `2016-07-01-macht-hoch-die-tuer.en.md`
* In the frontmatter of this file, set `language: en`. The `url` or `slug` parameter, if set, has to be prefixed with `/en/`.
* In case there is no translation (yet), consider creating a symlink to the german file, like `ln -s 2016-07-01-macht-hoch-die-tuer.de.md 2016-07-01-macht-hoch-die-tuer.en.md`, so that the english website shows at least the german text (related Hugo issue: https://github.com/gohugoio/hugo/issues/2529). 

#### Commiting

* Commit and push your changes to the main branch. The website is re-deployed automatically.
* If the post is not supposed to go online yet, set `draft: true` in the frontmatter or consider commiting to a different branch and submitting a pull request.



## TODO
- [ ] don't embed external images