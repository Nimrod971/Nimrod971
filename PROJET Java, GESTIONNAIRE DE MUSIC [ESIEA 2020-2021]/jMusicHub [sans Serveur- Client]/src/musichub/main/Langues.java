public enum Langues{
	Francais(new String("Francais")),
	Anglais(new String("Anglais")),
	Italien(new String("Italien")),
	Espagnol(new String("Espagnol")),
	Allemand(new String("Allemand")),
	Russe(new String("Russe"));

	private String nom;

	Langues(String nom){
		this.nom = nom;
	}

	public String toString(){
		return nom;
	}

}
