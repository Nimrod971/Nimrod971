//package jMusicHub;//il faut l'enlever lorsqu'on veut travailler sur invite de commande

import java.util.*;

public final class Main{

	public static void main(String[] args){
	    AlbumParse ab = new AlbumParse();
		System.out.print(ab.listAlbum()); //ça marche
		PlaylistParse pp = new PlaylistParse();
		System.out.print(pp.listPlaylist());
	}

}
