describe('Test création et lecture de paste', () => {

  it('Crée un paste protégé et vérifie son contenu', () => {

    // Aller sur la page d’accueil
    cy.visit('http://localhost:8080')

    // Remplir le message
    const message = 'Hello World'
    cy.get('#message').type(message)

    // Remplir le mot de passe
    const password = '1234'
    cy.get('#passwordinput').type(password)

    // Soumettre le formulaire
    cy.get('#sendbutton').click()

	cy.get('#pasteurl').click()
	

	cy.get('#passworddecrypt', { timeout: 10000 })
	.should('be.visible')
	.type(password)

	cy.contains('Déchiffrer').click()

	cy.get('#prettyprint')
	  .should('contain', message)

  })

})


