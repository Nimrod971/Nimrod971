public enum Categories{
	Jeunesse(new String("Jeunesse")),
	Roman(new String("Roman")),
	Theatre(new String("Theatre")),
	Discours(new String("Discours")),
	Documentaire(new String("Documentaire"));

	private String nom ;

	Categories(String nom){
		this.nom = nom;
	}

	public String toString(){
		return nom;
	}

}
