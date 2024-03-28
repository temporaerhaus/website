---
title: "{{ replace .Name "-" " " | title }}"
author: Your Name
type: post
date: {{ .Date }}
url: /{{ .Name | urlize }}/
language: de
# categories:
#   - Workshops
# tags:
#   - LoRaWAN
#   - Open Data Day
#   - TTN
# images:
#   - /wp-content/uploads/..../../titleimage.jpg
draft: true
---

Your Post Content here