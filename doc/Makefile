.PHONY: all c clean C help

all:
	@latexmk -pdf php-eps-macros-doc.tex

clean: C

C:
	@latexmk -C

c:
	@latexmk -c

help:
	@-echo "Options:"
	@-echo "   all     generate document"
	@-echo "   clean   same as C"
	@-echo "   c       latexmk -c"
	@-echo "   C       latexmk -C"
	@-echo "   help    show this help"
