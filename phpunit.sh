# help
./vendor/bin/phpunit -h

# run specific file
./vendor/bin/phpunit file_path

# debug details with which test is running
./vendor/bin/phpunit tests/AppBundle/Factory/DinosaurFactoryTest.php --debug

# filter
./vendor/bin/phpunit --filter testItGrowsADinosaurFromASpecification --debug

# debug just one test case of a provider
./vendor/bin/phpunit --filter 'testItGrowsADinosaurFromASpecification #1' --debug

# test case name
./vendor/bin/phpunit --filter 'testItGrowsADinosaurFromASpecification @default response' --debug

# Stopping on Failure or Error
./vendor/bin/phpunit --stop-on-failure --stop-on-error

# specific testsuite
./vendor/bin/phpunit --testsuite entities --debug