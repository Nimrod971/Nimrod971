public enum Color {
	//les instances d'une enum sont en nombre fini
	//HEART, SPADE etc... ce sont les noms des instances
	//méthode name() pour récuperer le nom (HEART, SPADE...)
	//méthode values() pour récuperer un tableau avec toutes les intances
	
	//le parametre "\u2665" est le symbole
	//HEART("\u2665"), SPADE("\u2660"), CLUB("\u2663"), DIAMOND("\u2666");
	HEART("❤️️"), SPADE("♠️"), CLUB("♣️"), DIAMOND("♦️");
	
	private String symbole;
	
	//constructeur privé ne peut pas être appellé depuis une autre classe
	private Color (String symbole)
	{
		this.symbole = symbole;
	}

	public String getSymbole()
	{
		return this.symbole;
	}
}
