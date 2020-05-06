repoversion=$(shell LANG=C aptitude show php-flexibee-config | grep Version: | awk '{print $$2}')
nextversion=$(shell echo $(repoversion) | perl -ne 'chomp; print join(".", splice(@{[split/\./,$$_]}, 0, -1), map {++$$_} pop @{[split/\./,$$_]}), "\n";')


all: fresh build install

fresh:
	echo fresh

install: 
	echo install
	
build:
	echo build

clean:
	rm -rf debian/php-flexibee-config 
	rm -rf debian/*.substvars debian/*.log debian/*.debhelper debian/files debian/debhelper-build-stamp

debtest:
	DH_VERBOSE=1 sudo gdebi ../php-flexibee-config_*.deb

deb:
	dch -v $(nextversion) `git log -1 --pretty=%B | head -n 1`
	debuild -i -us -uc -b

dimage:
	docker build -t vitexsoftware/flexibee-client-config .

.PHONY : install
