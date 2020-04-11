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
	DH_VERBOSE=1 sudo gdebi ../debian/php-flexibee-config_*.deb

deb:
	dch -i
	debuild -i -us -uc -b

dimage:
	docker build -t vitexsoftware/flexibee-client-config .

.PHONY : install
	