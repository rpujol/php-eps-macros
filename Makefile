SHELL=/bin/sh

.PHONY: all c C clean doc help

all: doc

doc:
	@$(MAKE) -C doc

c:
	@$(MAKE) -C doc c

C:
	@$(MAKE) -C doc C

clean:
	@$(MAKE) -C doc clean

help:
	@-echo "make options:"
	@-echo "   all"
	@-echo "   doc"
	@-echo "   c"
	@-echo "   C"
	@-echo "   clean"
	@-echo "   help"
