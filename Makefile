SHELL=/bin/sh

.PHONY: all c C clean cleanREADME doc help

all: doc README README.html

doc:
	@$(MAKE) -C doc

c: cleanREADME
	@$(MAKE) -C doc c

C: cleanREADME
	@$(MAKE) -C doc C

clean: cleanREADME
	@$(MAKE) -C doc clean

cleanREADME:
	@-rm -rfv README README.html

help:
	@-echo "make options:"
	@-echo "   all"
	@-echo "   doc"
	@-echo "   c"
	@-echo "   C"
	@-echo "   clean"
	@-echo "   cleanREADME"
	@-echo "   help"
	@-echo "   README"
	@-echo "   README.html"

%.html: %.md
	@pandoc -t html -o $@ $<

%: %.md
	@pandoc -t plain -o $@ $<
