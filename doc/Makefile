SHELL=/bin/sh

.PHONY: all c clean cleanfigs C figs g help pdf re

all: figs pdf

c:
	@latexmk -c

clean: C cleanfigs

cleanfigs:
	@$(MAKE) -C figs clean

C:
	@latexmk -C

figs:
	@$(MAKE) -C figs

g:
	@latexmk -g php-eps-macros-doc

help:
	@-echo "Options:"
	@-echo "   all     generate document"
	@-echo "   clean   latexmk -C + cleanfigs"
	@-echo "   c       latexmk -c"
	@-echo "   C       latexmk -C"
	@-echo "   figs    run make in figs directory (make figures only)"
	@-echo "   g       latexmk -g"
	@-echo "   help    show this help"
	@-echo "   pdf     only runs latexmk"
	@-echo "   re      clean and run pdf"

pdf:
	@latexmk -pdf php-eps-macros-doc

re: C pdf

