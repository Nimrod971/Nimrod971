public enum Genres{
	JAZZ(new String("Jazz")),
	CLASSIQUE(new String("Classique")),
	HIPHOP(new String("HipHop")),
	ROCK(new String("Rock")),
	POP(new String("Pop")),
	KPOP(new String("KPop")),
	RAP(new String("Rap"));

	private String nom ;

	Genres(String nom){
		this.nom = nom;
	}

	public String toString(){
		return nom;
	}

}
