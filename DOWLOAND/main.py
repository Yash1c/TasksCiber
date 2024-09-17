import PySimpleGUI as sg
from pytubefix import YouTube  # Importando do pytubefix em vez do pytube

sg.theme('Dark Blue 16')

interface = [
    [sg.Titlebar('Youtube Downloader', None, "red", "white")],
    [sg.Text('Enter the URL of the video you want to download:')],
    [sg.Input(size=(50, 1), key="url")],
    [sg.Button('Download')],
]

janela = sg.Window('Youtube Downloader', interface)

while True:
    evento, valores = janela.read()

    if valores == sg.WIN_CLOSED:
        break

    if evento == 'Download':
        link = valores["url"]  # Obtendo a URL do campo de entrada
        video = YouTube(link)
        stream = video.streams.get_highest_resolution().download()

    print('Download concluído!')

janela.close()
exit()
