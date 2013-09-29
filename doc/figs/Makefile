SUBDIRS:=$(wildcard */)
SUBDIRS_clean:=$(addsuffix clean,$(SUBDIRS))

SHELL=/bin/sh

.PHONY: all c clean C $(SUBDIRS) $(SUBDIRS_clean)

all: $(SUBDIRS)

c: clean

C: clean

clean: $(SUBDIRS_clean)

$(SUBDIRS):
	@$(MAKE) -C $@

$(SUBDIRS_clean):
	@$(MAKE) -C $(dir $@) clean
