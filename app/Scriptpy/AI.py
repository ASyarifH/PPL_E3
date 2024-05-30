# import os
# import pandas as pd
# from sklearn.ensemble import RandomForestClassifier
# from sklearn.preprocessing import LabelEncoder
# import sys

# # Dapatkan path ke skrip Python
# script_dir = os.path.dirname(os.path.abspath(__file__))
# # Buat path lengkap ke file "Data Prediksi Tanam.xlsx"
# data_file_path = os.path.join(script_dir, 'Data Prediksi Tanam.xlsx')

# # Baca data dari file Excel
# data = pd.read_excel(data_file_path)

# data['Kecepatan Angin'] = data['Kecepatan Angin'].astype(str)
# data['Kelembapan'] = data['Kelembapan'].astype(str)
# data['Intensitas Cahaya'] = data['Intensitas Cahaya'].astype(str)
# data['Intensitas Curah Hujan'] = data['Intensitas Curah Hujan'].astype(str)

# # Langkah 2: Pemrosesan Data
# label_encoder = LabelEncoder()
# data['Curah Hujan'] = label_encoder.fit_transform(data['Curah Hujan'])
# data['Kecepatan Angin'] = label_encoder.fit_transform(data['Kecepatan Angin'])
# data['Kelembapan'] = label_encoder.fit_transform(data['Kelembapan'])
# data['Intensitas Cahaya'] = label_encoder.fit_transform(data['Intensitas Cahaya'])
# data['Intensitas Curah Hujan'] = label_encoder.fit_transform(data['Intensitas Curah Hujan'])

# data = pd.get_dummies(data, columns=['Curah Hujan'])
# data = pd.get_dummies(data, columns=['Kecepatan Angin'])
# data = pd.get_dummies(data, columns=['Kelembapan'])
# data = pd.get_dummies(data, columns=['Intensitas Cahaya'])
# data = pd.get_dummies(data, columns=['Intensitas Curah Hujan'])

# # Memisahkan fitur dan label
# X = data[['Suhu', 'pH'] + [col for col in data.columns if col.startswith('Curah Hujan_')] +
#          [col for col in data.columns if col.startswith('Kecepatan Angin_')] +
#          [col for col in data.columns if col.startswith('Kelembapan_')] +
#          [col for col in data.columns if col.startswith('Intensitas Cahaya_')] +
#          [col for col in data.columns if col.startswith('Intensitas Curah Hujan_')]]
# y = data['Tanaman Cocok']

# # Pilih Model
# model = RandomForestClassifier(random_state=42)
# model.fit(X, y)

# # Langkah 7: Prediksi
# def predict_crop(suhu, curah_hujan, pH, kecepatan_angin, kelembapan, intensitas_cahaya, intensitas_curah_hujan):
#     # Melakukan label encoding pada curah_hujan yang dimasukkan oleh pengguna karena data string
#     encoded_curah_hujan = label_encoder.transform([curah_hujan])[0]

#     encoded_kecepatan_angin = label_encoder.transform([kecepatan_angin])[0]
#     encoded_kelembapan = label_encoder.transform([kelembapan])[0]
#     encoded_intensitas_cahaya = label_encoder.transform([intensitas_cahaya])[0]
#     encoded_intensitas_curah_hujan = label_encoder.transform([intensitas_curah_hujan])[0]

#     # Melakukan prediksi
#     prediction = model.predict([[suhu, pH] + [1 if col == f'Curah Hujan_{encoded_curah_hujan}' else 0 for col in X.columns[2:]]  + [1 if col == f'Curah Hujan_{encoded_kecepatan_angin}' else 0 for col in X.columns[2:]]  + [1 if col == f'Curah Hujan_{encoded_kelembapan}' else 0 for col in X.columns[2:]]  + [1 if col == f'Curah Hujan_{encoded_intensitas_cahaya}' else 0 for col in X.columns[2:]]  + [1 if col == f'Curah Hujan_{encoded_intensitas_curah_hujan}' else 0 for col in X.columns[2:]]])
#     return prediction[0]

# # Ambil argumen dari command line
# suhu = float(sys.argv[1])
# curah_hujan = sys.argv[2]
# pH = float(sys.argv[3])
# kecepatan_angin = sys.argv[4]
# kelembapan = sys.argv[5]
# intensitas_cahaya = sys.argv[6]
# intensitas_curah_hujan = sys.argv[7]

# # Panggil fungsi predict_crop dengan argumen dari command line
# hasil_prediksi = predict_crop(suhu, curah_hujan, pH, kecepatan_angin, kelembapan, intensitas_cahaya, intensitas_curah_hujan)

# # Cetak hasil prediksi
# print("Hasil Prediksi:", hasil_prediksi)


import os
import pandas as pd
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import LabelEncoder
import sys

script_dir = os.path.dirname(os.path.abspath(__file__))
data_file_path = os.path.join(script_dir, 'Data Prediksi Tanam.xlsx')

data = pd.read_excel(data_file_path)

label_encoder = LabelEncoder()
data['Curah Hujan'] = label_encoder.fit_transform(data['Curah Hujan'])

data = pd.get_dummies(data, columns=['Curah Hujan'])

X = data[['Suhu', 'pH', 'Kelembapan'] + [col for col in data.columns if col.startswith('Curah Hujan_')]]
y = data['Tanaman Cocok']

model = RandomForestClassifier()

model.fit(X, y)

def predict_crop(suhu, curah_hujan, pH, kelembapan):
    if curah_hujan in label_encoder.classes_:
        encoded_curah_hujan = label_encoder.transform([curah_hujan])[0]
        prediction = model.predict([[suhu, pH, kelembapan] + [1 if col == f'Curah Hujan_{encoded_curah_hujan}' else 0 for col in X.columns[3:]]])
        return prediction[0]
    elif curah_hujan == 'hujan petir':
        return "Tidak dapat diprediksi"
    else:
        return None

suhu = float(sys.argv[1])
curah_hujan = sys.argv[2]
pH = float(sys.argv[3])
kelembapan = float(sys.argv[4])

hasil_prediksi = predict_crop(suhu, curah_hujan, pH, kelembapan)

print("Hasil Prediksi:", hasil_prediksi)
