To run the project and send the form (macOS):

1. download the archive
2. install MAMP
3. unpack the archive in Applications ▹ MAMP ▹ htdocs
4. start the local server and go to the link http://localhost/test-form-main/
5. fill out the form and receive a mail to the address you specify in the Email field

To convert scss -> css:

1. open terminal and cd to (your patch)/test-form-main
2. install sass (required node/npm): npm install -g sass or npm install sass --save-dev
3. add to package.json following code:
"scripts": {
  "sass": "sass --watch src/scss:dist/css"
}
4. npm run sass 
