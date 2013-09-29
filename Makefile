SHELL=/bin/sh

.PHONY: all c C clean doc help

all: doc README README.html

doc:
	@$(MAKE) -C doc

c:
	@$(MAKE) -C doc c
	@-rm -rfv README README.html

C:
	@$(MAKE) -C doc C
	@-rm -rfv README README.html

clean:
	@$(MAKE) -C doc clean
	@-rm -rfv README README.html

help:
	@-echo "make options:"
	@-echo "   all"
	@-echo "   doc"
	@-echo "   c"
	@-echo "   C"
	@-echo "   clean"
	@-echo "   help"
	@-echo "   README"
	@-echo "   README.html"

%.html: %.md
	@pandoc -t html -o $@ $<

%: %.md
	@pandoc -t plain -o $@ $<
