---
title: "{{ replace .Name "-" " " | title }}"
author: Your Name
type: post
date: {{ .Date }}
url: /{{ .Name | urlize }}/
language: de
# featured_image:
# categories:
#   - Workshops
# tags:
#   - LoRaWAN
#   - Open Data Day
#   - TTN
draft: true
---

Your Post Content here